# InternHub
**An Online Internship Portal built in PHP.**
<br>
![Image](images/banner.jpg?raw=true "Banner")

## Features
**Student Account**
* Sign-Up and Login using Google/Facebook account or create an account on the server.
* Create a CV using an easy to use form-field CV generator. Download a pdf version of the CV generated.
* Browse Internships and filter them according to your requirements.
* Apply for Internships easily with your saved CV attached automatically.

**Company Account**
* Create account on the server.
* Create new internship posts and review old posts.
* View applications received from students along with their resume.
* Shortlist or Reject students based on your preference. Email confirmation will be sent to the students.
* Browse list of students and invite them to apply for particular posts.

## Technologies Used
* PHP (Version 7.4)
* HTML
* CSS
* Bootstrap
* MySQL
* JavaScript

## Additional Requirements
**PHP Libraries**
* Install PHPMailer, Dompdf, Google, Facebook Graph SDK libraries using composer.
* Change/Add database values in "connect.php" & "connect2.php" files in _includes_ folder.
* Create App in Google and Facebook developer accounts and add app id, app secret and redirect URI in "google_config.php", "google_signin.php", "facebook_config.php" & "facebook_signin.php".

