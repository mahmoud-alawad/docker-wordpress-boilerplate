#!/bin/bash

if [ "$#" -ne 1 ]
then
  echo "Provide a name for your project (./setup.sh myproject)"
  exit 1
fi

FOLDER_BEDROCK="wordpress-$1"
FOLDER_THEME="theme-$1"
THEME_NAME="${1^}"

# Install Bedrock architecture
composer create-project roots/bedrock $FOLDER_BEDROCK

# Install Sage theme
cd "./$FOLDER_BEDROCK/web/app/themes"
composer create-project roots/sage $FOLDER_THEME


cd ../../../../../

# Fix permission
sudo chown wordpress:www-data -R "./$FOLDER_BEDROCK"
sudo chmod 775 -R "./$FOLDER_BEDROCK"
sudo chmod 777 -R "./$FOLDER_BEDROCK/web/app/uploads"