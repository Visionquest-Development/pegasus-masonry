# pegasus-masonry

# Pegasus-masonry

## What is the difference between Masonry, Isotope, and Packery?

Masonry, Isotope, and Packery are all similar in that they are layout libraries. Many of their options and methods are the same.

Masonry does cascading grid "masonry" layouts. Packery does bin-packing layouts, which allow it to be used for draggable interactions.

Isotope does sorting and filtering. Isotope uses masonry layouts, as well as other layouts.
 
## Usage
How to use in your WordPress site<br>
`[masonry]<img src="#"><img src="#"><img src="#">[/masonry]`<br>
Shortcode Attributes: http://pegasustheme.com/pegasus-masonry/


## Installation
How to install to your WordPress site

### Simple Instructions 
Go to [Github](https://github.com/Visionquest-Development/pegasus-masonry "Github") and click "Clone or download" and make sure it says "Clone with HTTPS" at the top and click "Download Zip" and save it to a folder on your PC. Then, go to WordPress Back-end and go to Plugins -> Add New and then click on "Upload Plugin" and upload the zip file you downloaded from Github.

### Advanced Setup 
#### 1.) Upload via FTP/WordPress Admin<br>
Download zip file from [here](https://github.com/Visionquest-Development/pegasus-masonry/archive/master.zip "Github") and on extraction make sure the folder name you extract to is saved as pegasus-masonry instead of pegasus-masonry-master
Then upload to you server using an FTP program or Use the WordPress Plugin Upload feature in the WordPress Admin.<br>
#### 2.) In the terminal:
###### For https connection use:
`git clone https://github.com/Visionquest-Development/pegasus-masonry.git pegasus-masonry`

###### For SSH implementation use this command and make sure you have the SSH key setup on both your terminal and github account. You will need to use your passkey for each update.
`git clone git@github.com:Visionquest-Development/pegasus-masonry.git pegasus-masonry`



## How to update
### Simple Instructions
Use the WordPress Admin or your favorite FTP program to delete the old plugin from the plugins folder. Then follow the Installation instructions again from above.

### Advanced Setup 
If you used the Advanced Setup, all you need to do is `cd /path/where/plugin/exists` && `git pull`.


## How to contribute
If you plan on helping make this plugin better then please follow our guidelines for contributions. We recommend you use a terminal and git clone our repository by using the Advanced Installation Instructions from above. Then, use `git checkout -b new-branch-name` to create your own branch, and rename it to whatever you want by replacing `new-branch-name`. Make your changes and then add and commit them to your branch. Make sure to use `git push -u origin new-branch-name` with the new name when you get done committing your changes to set the upstream for your branch. Then, login to github.com and go to the repo you updated with your new branch and submit a Pull Request. We will review Pull Requests and accept them if it fits with our guidelines and current setup.




