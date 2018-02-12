chmod 600 /tmp/amti_rsa.pub
eval "$(ssh-agent -s)" # Start the ssh agent
ssh-add /tmp/amti_rsa.pub
git remote add amti_2016 git@git.wpengine.com:staging/amti2016.git # add remote for staging site
git fetch --unshallow # fetch all repo history or wpengine complain
git status # check git status
git checkout master # switch to development branch
git add wp-content/themes/amti/*.css -f # force all compiled CSS files to be added
git commit -m "compiled assets" # commit the compiled CSS files
git push -f amti_2016 master:master #deploy to staging site from development to master
