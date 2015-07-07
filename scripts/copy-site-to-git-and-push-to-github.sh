#!/usr/local/bin/bash
GIT="/www/molsim/progs/git/bin/git";
dbname="wwwmolsimorg";      
dbhost="localhost";
dbuser="molsim";  
dbpass="sw8Dwsae";   

webrootdir="/www/molsim/www/htdocs"; 
scriptsdir="/www/molsim/scripts";

gitRepoBase="/www/molsim/molsim_backup";


startdir=`pwd`;


  echo "fullsitebackup_git.sh by Alexey Shaytan";

  echo "Cleaning git folder and checkout to the latest state";
  
  cd $gitRepoBase;
  $GIT checkout master;
  chmod -R u+w htdocs;
  chmod -R u+w scripts;
  chmod -R u+w db;
  rm -R htdocs;
  rm -R scripts;
  rm -R db;

  echo " .. copying website folder  $webrootdir to $gitRepoBase";
  cd $webrootdir;
  pwd=`pwd`;
  cp -Rpf $pwd $gitRepoBase/;
  echo "    done";
  
  echo " .. copying script files in $scriptsdir to $gitRepoBase/scripts";
  cd $scriptsdir;
  pwd=`pwd`;
  cp -Rf $pwd $gitRepoBase/scripts;
  echo "    done";
  
  echo " .. sqldump'ing database:";
  echo "    user: $dbuser; database: $dbname; host: $dbhost";
  cd $gitRepoBase;
  mkdir db;
  cd db;
  /usr/local/bin/mysqldump --password=$dbpass --user=$dbuser --host=$dbhost --add-drop-table $dbname > dbcontent.sql;
  echo "    done";


  echo " .. Committing to local git repository at $gitRepoBase";
  datestamp=`date`;
 
  cd $gitRepoBase;
  $GIT add ./*;
  $GIT commit -am "$1: $datestamp";
  echo "    done";


  echo " .. Pushing backup to GitHub";
  $GIT push origin master;
  echo "    done";

  echo " .. Clean-up";
  cd $startdir;
  echo "    done";

 
  echo " .. Full site backup complete";

