#!/usr/local/bin/bash
GIT="/www/molsim/progs/git/bin/git";
dbname="wwwmolsimorg";      
dbhost="localhost";
dbuser="molsim";  
dbpass="sw8Dwsae";   

wwwdir="/www/molsim/www"; 
scriptsdir="/www/molsim/scripts";

gitRepoBase="/www/molsim/git-backup";


startdir=`pwd`;


  echo "fullsitebackup_git.sh by Alexey Shaytan";

  echo "Deleting htdocs folder in $wwwdir";
  
  cd $wwwdir;
  chmod -R u+w htdocs;
  rm -R htdocs;

  echo " .. copying website folder htdocs from $gitRepoBase to $wwwdir";
  cd $gitRepoBase;
  cp -Rpf htdocs $wwwdir/;
  echo "    done";
  
#
# Load database information
#
cd $gitRepoBase;
cd db;
echo " .. loading database:"
echo "    user: $dbuser; database: $dbname; host: $dbhost"
echo "use $dbname; source dbcontent.sql;" | mysql --password=$dbpass --user=$dbuser --host=$dbhost
echo "    done"
  
 
  echo " .. Clean-up";
  cd $startdir;
  echo "    done";

 
  echo " .. Full site recovery complete";

