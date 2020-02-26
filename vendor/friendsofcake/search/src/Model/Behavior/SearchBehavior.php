<?php
namespace Search\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Query;
use Cake\Utility\Hash;
use Exception;
use Search\Manager;

class SearchBehavior extends Behavior
{

    /**
     * Search Manager instance.
     *
     * @var \Search\Manager
     */
    public $_manager = null;

    /**
     * Default config for the behavior.
     *
     * ### Options
     * - `searchConfigMethod` Method name of the method that returns the filters.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'searchConfigMethod' => 'searchConfiguration',
        'implementedFinders' => [
            'search' => 'findSearch'
        ],
        'implementedMethods' => [
            'filterParams' => 'filterParams',
            'searchManager' => 'searchManager',
            'isSearch' => 'isSearch'
        ],
    ];

    /**
     * Internal flag to check whether the behavior modified the query.
     *
     * @var bool
     */
    protected $_isSearch = false;

    /**
     * Callback fired from the controller.
     *
     * @param Query $query Query.
     * @param array $options The options for the find.
     *   - `search`: Array of search arguments.
     *   - `collection`: Filter collection name.
     * @return \Cake\ORM\Query The Query object used in pagination.
     * @throws \Exception When missing search arguments.
     */
    public function findSearch(Query $query, array $options)
    {
        if (!isset($options['search'])) {
            throw new Exception(
                'Custom finder "search" expects search arguments ' .
                'to be nested under key "search" in find() options.'
            );
        }
        $filters = $this->_getAllFilters(Hash::get($options, 'collection', 'default'));
        $params = (array)$options['search'];
        $params = Hash::flatten($params);
        $params = array_intersect_key(Hash::filter($params), $filters);

        $this->_isSearch = false;
        foreach ($filters as $filter) {
            $filter->args($params);
            $filter->query($query);

            if (!$filter->skip()) {
                $this->_isSearch = true;
            }
            $filter->process();
        }

        return $query;
    }

    /**
     * Returns true if the findSearch call modified the query in a way
     * that at least one search filter has been applied.
     *
     * @return bool
     */
    public function isSearch()
    {
        return $this->_isSearch;
    }

    /**
     * Returns search params nested in array with key `_search` for passing as
     * options to find method.
     *
     * @param array $params A key value list of search parameters to use for a search.
     * @return array
     * @deprecated 2.0.0 You can directly call find like
     *   `find('search', ['search' => $this->request->query])`
     */
    public function filterParams($params)
    {
        return ['search' => $params];
    }

    /**
     * Returns the search filter manager.
     *
     * @return \Search\Manager
     */
    public function searchManager()
    {
        if ($this->_manager === null) {
            $this->_manager = new Manager($this->_table);
        }

        return $this->_manager;
    }

    /**
     * Gets all filters by the default or given collection from the search manager
     *
     * @param string|null $collection name of collection
     * @return \Search\Model\Filter\Base[] An array of filters for the defined fields.
     */
    protected function _getAllFilters($collection = 'default')
    {
        $method = $this->config('searchConfigMethod');
        if (method_exists($this->_table, $method)) {
            $manager = $this->_table->{$method}();
        } else {
            $manager = $this->searchManager();
        }

        return $manager->getFilters($collection);
    }
}
