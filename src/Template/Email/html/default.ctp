<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>


<!doctype html>
<html>
<head>
<title>Nova senha - </title>
</head>

<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#d2d6de">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#d2d6de">
  <tbody>
    <tr>
      <td align="center" valign="middle">
        <table width="10%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
          <tr>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center">
   
            <?= $this->Html->image('', ['alt'=>'Thor' ,'width' => '195', 'heigt' => '113']);  ?>
     </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>
              <table border="0" cellspacing="0" cellpadding="60" bgcolor="#ffffff">
              <tbody>
                <tr>
                  <td>
                      <font face="arial" color="#7A7A7A">
                        <h1>Criar uma nova senha</h1>
                        <p>Este é o primeiro acesso ao sistema ou esqueceu a sua senha? Sem problemas, vamos lá. Para criar a sua senha ou criar uma nova senha, basta clicar neste link:</p>
                        

                        <?php
$content = explode("\n", $content);

foreach ($content as $line):
   
    echo '<p> ' . $line . "</p>\n";
endforeach;

?>
</font></p>
                        <p>Este é o procedimento de criação de uma nova senha no sistema. Se você NÃO solicitou uma nova senha, ignore este e-mail e a sua senha permanecerá a mesma.</p>
                        <p>Obrigado, <br/>A equipe Thor</p>
                     </font>
                  </td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>
