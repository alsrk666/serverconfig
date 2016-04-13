<?php

header('Content-type:text/plain');

$dir = "/var/www/html/pnpwar/";

$dh  = opendir($dir);

$str="";

while (false !== ($filename = readdir($dh))) {


$filename=explode(".",$filename);

$file=$filename[0];


if($filename[1]=="war")

{

	

$str.='<application context-root="/'.$file.'" id="'.$file.'" location="'.$file.'.war" name="'.$file.'" type="war">

        <classloader delegation="parentLast">

            <privateLibrary id="worklightlib_'.$file.'">

                <fileset dir="${shared.resource.dir}" includes="worklight-jee-library.jar"/>.

                <fileset dir="${wlp.install.dir}/lib" includes="com.ibm.ws.crypto.passwordutil*.jar"/>

            </privateLibrary>

        </classloader>

    </application>

    <!-- Declare the IBM MobileFirst Server database. -->

    <dataSource jndiName="'.$file.'/jdbc/WorklightDS" transactional="false">

        <jdbcDriver libraryRef="DerbyLib"/>

        <properties.derby.embedded createDatabase="create" databaseName="${shared.resource.dir}/derbyDB/'.$file.'/WRKLGHT" user="WORKLIGHT"/>

    </dataSource>

    <!-- Define any other IBM MobileFirst Server properties here -->

    <jndiEntry value="false" jndiName="'.$file.'/mfp.session.independent"/>

    <jndiEntry value="httpsession" jndiName="'.$file.'/mfp.attrStore.type"/>

    

    ';


}

}

$str1="";$str2="";

$file = fopen("/var/www/html/2.txt", "r") or exit("Unable to open file!");

while(!feof($file))

  {

  $string=fgets($file);

$str1.=$string;

  }

//echo $str;

$file = fopen("/var/www/html/1.txt", "r") or exit("Unable to open file!");

while(!feof($file))

  {

  $string=fgets($file);

    $str2.=$string;

  }
//echo $str2;

$str3=$str1.$str.$str2;

$file=fopen("server.txt","w");

fwrite($file,$str3);

shell_exec('sudo sh /var/www/html/s1.sh 2>&1');
?>





?>
