# Description

This is a simple blog posts project built with Laravel. It allows users to make CRUD operation on posts beside each user has profile page to edit his info.



# Featuers

- Ability to delete posts using the soft delete technique, as well as the restore them 
- A slug is created for each post to enhance SEO.
- Users can upload an image for each post. 
- Users can put comment on others posts . 
- Tags can be added for each post.
- A scheduled job is implemented to delete old posts that are created two years ago at midnight.
- Every post has a unique title using the validation rules.
- Login using Github and Google to demonstrate concept of OAuth 
- Each user has a limited number of posts 3 posts as a custom rule validation.
- Each user can upload his image using the media library.
- Users can update their information such as name, email, address, and photo


## Api 
| Method | End Point | Function |
|------- | --------- | -------- |
| GET    | /posts    | get all posts |
| GET    | /posts/{post}    | get post details |
| POST   | /posts    | create post |
| PUT    | /posts/{post}   | update post |

## used Packages 

| Packages Name | For |
| ------------- | ------------- |
| Laravel Ui  | authentication   |
| eloquent-sluggable  |  creation of slugs  |
| laravel-tags |  taggable behaviour  |




<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


