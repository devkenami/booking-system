### GIT COMMANDS

- `git pull`: pull changes from the branch.
- `git push`: push/upload changes from local to online(github)
- `git push -u origin {branch-name}`: to push/upload changes from newly created branch to online(github)
- `git checkout -b {branch-name}`: creates a new branch then checout on that branch
- `git branch`: to check your current branch
- `git branch {branch-name}`: create new branch
- `git status` check the modified files
- `git add .`: add all files to git
- `git commit -m "message here"`: commit changes
- `git checkout {branch-name}`: go to one branch to another branch

## Before doing changes
1. `git checkout master`: go to master branch
2. `git status`: should be no changes on master branch before pulling codes
3. `git pull`: pull changes from github repo before doing anything

## Doing Changes (Current)
1. Do changes
2. create a new branch `git branch {new-branch-name}`
3. check the what files is modified before pushing on github

## After doing changes
1. `git add .` add all modified branch on git
2. `git commit -m "message here"` commit the changes and add a brief description to your changes
3. push the changes
4. create a pull request
5. add a reviewer
6. If code changes is approve do `sqaush and merge`
7. after merging the code `delete the branch


