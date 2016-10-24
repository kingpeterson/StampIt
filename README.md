# CMPE207-Final-Project
# StampIt

The website is written in PHP and JavaScript, and the user interface is a modified bootstrap template. There are four pages; a homepage that briefly introduce what the website is about, a gallery page that shows all the pictures uploaded by all clients including iOS, Android, Python and Java, a member page that can only be accessed when logged in, and finally a contact page for user to send inquires. 
When going into the member page, the web client will fetch the session variable that contains user information. If data is available, then access is granted and user can go inside to see pictures and upload.
The upload function is implemented with curl, so not only the local domain will obtain the file, the other five domains on the list will also get it. Aside of the file itself, after uploading the file to the file system, the record of the file is also, the person who upload and the URL of the picture, uploaded to the database through MySQL. 
User can leave comments to each picture, the comment is uploaded to database using JavaScript and displaying it instantly without refreshing the page using Ajax.
