#!/usr/local/bin/bash
GIT="/www/molsim/progs/git/bin/git";


gitRepoBase="/www/molsim/molsim_backup";

if [ -z "$1" ]; then
   echo "Usage: checkout-to-older-commit.sh commit_name";
    exit
fi

startdir=`pwd`;
 
  cd $gitRepoBase;
 


  echo " .. Checkng out to commit $1";
  $GIT checkout $1;
  echo "    done";

  echo " .. Clean-up";
  cd $startdir;
  echo "    done";

 
  echo " .. Checkout complete";

