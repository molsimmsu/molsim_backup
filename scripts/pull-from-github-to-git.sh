#!/usr/local/bin/bash
GIT="/www/molsim/progs/git/bin/git";



gitRepoBase="/www/molsim/molsim_backup";


startdir=`pwd`;
 
  cd $gitRepoBase;
 


  echo " .. Pulling latest head from backup on GitHub";
  $GIT pull origin master;
  echo "    done";

echo "... Setting checkout to master";
$GIT checkout master;

  echo " .. Clean-up";
  cd $startdir;
  echo "    done";

 
  echo " .. Full site pull complete";

