#!/bin/bash
# #! mean compiler is
# echo hope
# #c:/xampp/htdocs/code/bashtest.sh
# read -p "Enter something" INPUT
# echo $INPUT
# echo -e "Countdown: 3\r"
# sleep 1
# echo -e "Countdown: 2\r"
# sleep 1
# echo -e "Countdown: 1\r"
# sleep 1
# echo -e "Countdown: 0\r"

# variable="Hello, world!"

# # Use declare to get the type of the variable
# declare -p variable

# fruits=("apple" "banana" "orange")

# for i in "${fruits[@]}" 
  
#   do
# echo $i
# done

# if [['get(50)' =~ "(?=>\( )"]]
#  then
#   echo "yes
  
# fi




# # Set the source and destination directories
# source_dir=$(pwd)
# destination_dir=$(dirname "$source_dir")

# # Find all HTML files in the source directory
# find "$source_dir" -name "*.html" -type f | while read -r file; do
#   # Determine the destination file path
#   destination_file="$destination_dir/$(basename "$file")"

#   # Check if the destination file does not exist or if the source file is newer
#   if [[ ! -e "$destination_file" || "$file" -nt "$destination_file" ]]; then
#     # Copy the file to the destination directory
#     cp "$file" "$destination_file"
#     echo "Copied: $file"
#   else
#     echo "Skipped: $file"
#   fi
# done


find ./*.html | while read -r file; do
  if [[ ! -e "$file" && "$file" -nt "../$(basename "$file")" ]]; then
    cp "$file" "../$(basename "$file")"
  fi
done

name="John Doe"
echo "HELLO ${name:0:4}"

# Original string
text="Hello, world!"

# Using parameter expansion to replace "world" with "everyone"
new_text="${text/world/everyone}"  #inside text variable, replace world with everyone

# Output the modified string
echo "$new_text"

# Original paths
path1="/home/user/documents/file.txt"
path2="usr/home/user/pictures/image.jpg"

# Extracting directory and filename using parameter expansion
dir1="${path1%/*}" #remove all character  <---(surfix from R to L) stop at first /
dir2="${path2%%/*}" #remove all character  <---(surfix from R to L) stop at last /
filename1="${path1#*/}" #remove all character  --->(surfix from L to R) stop at first /
filename2="${path2##*/}" #remove all character  --->(surfix from L to R) stop at last /

# Replacing file extension using parameter expansion
new_extension1="${filename1%.txt}.pdf"  # Replace .txt with .pdf for filename1
new_extension2="${filename2%.jpg}.png"  # Replace .jpg with .png for filename2

# Output the results
echo "Directory 1: $dir1"
echo "Directory 2: $dir2"
echo "Filename 1: $filename1"
echo "Filename 2: $filename2"
echo "New Extension 1: $new_extension1"
echo "New Extension 2: $new_extension2"
