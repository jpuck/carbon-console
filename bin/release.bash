#!/bin/bash

set -e

if [ -z "$1" ]; then
    echo "version required"
    exit 1
fi

# move to working directory
cd $( dirname "${BASH_SOURCE[0]}" )/../

# add version to script
sed -i "s/namespace jpuck\\\CarbonConsole;/namespace jpuck\\\CarbonConsole;\n\$version = '$1';/" bin/carbon

composer install --no-dev

# https://github.com/clue/phar-composer
phar-composer build .

# undo hard-coded version in script
git reset --hard

git tag "$1"

composer install
