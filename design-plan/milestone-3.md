# Project 3, Milestone 3: **Team** Design Journey

[← Table of Contents](design-journey.md)

**Make the case for your decisions using concepts from class, as well as other design principles, theories, examples, and cases from outside of class (includes the design prerequisite for this course).**

You can use bullet points and lists, or full paragraphs, or a combo, whichever is appropriate. The writing should be solid draft quality.


## Milestone 2 Team Feedback Revisions
> Explain what your **team** collectively revised in response to the Milestone 2 feedback (1-2 sentences)
> If you didn't make any revisions, explain why.

We got full points and no feedback on our collective work so nothing changed in response to the lack of negative feedback.

## File Upload - Types of Files
> What types of files will you allow users to upload?
> Can users upload any type of file? Can user only upload one type of file?
> Or can users upload several different types of files?
> List the file extensions of the types of files your users may upload.

- jpg
- ...


## File Upload - Updated DB Schema
> Plan any updates you need to make to your database schema to support file uploads.
>
> 1. Copy your Project 3 DB Schema for the _entries_ table here.
> 2. Modify the schema to include any file upload information you desire to store in your database.
>    If you don't need to modify anything, explain why.

posts
CREATE TABLE posts (
    id INTEGER NOT NULL UNIQUE,
    title TEXT NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY(id AUTOINCREMENT)
)

```
CREATE TABLE posts (
    id INTEGER NOT NULL UNIQUE,
    title TEXT NOT NULL,
    description TEXT NOT NULL,
    img_source TEXT,
    PRIMARY KEY(id AUTOINCREMENT)
)
```


## File Upload - File Storage
> Plan the file path to store the uploaded files on the server's file system.
> Store the uploaded files in a subfolder of the `public/uploads` folder using the entries table name as the subfolder name.

public/uploads/posts



## File Upload - Path and URL
> Assume that a user completed the insert/edit entry form.
> The **id** for the new record is **154**.
>
> 1. Plan the file system path to store the uploaded file.
> 2. Plan the URL to load the uploaded file in your website's HTML.

**File System Storage Path:**

```
public/uploads/posts
```

**Resource URL:**

```
<picture>
  <img src="/public/uploads/posts/1.jpg" alt="Description of Image">
</picture>
```


## File Upload - Form Input
> Write the HTML of an `<input>` element that allows users to upload a file.

```html
<div class="form_upload">
  <label for="request-upload"> Upload JPG File:</label>
  <input id="request-upload" type="file" name="jpg-file" accept=".jpg,image/jpg+xml">
</div>
```


## File Upload - PHP File Upload Data
> Use the `name` attribute of the file input you planned above to plan how you will
> access the uploaded file data in PHP using the `$_FILES` superglobal.

> Write the PHP code to access the uploaded file data from the `$_FILES` superglobal.
> Only include the data you will extract from the `$_FILES` superglobal. For example, the file name.
> Hint: <https://www.php.net/manual/en/features.file-upload.post-method.php>

```
if ($_FILES['jpg-file']['error'] === UPLOAD_ERR_OK) {
    $file_name = $_FILES['jpg-file']['name'];
    $file_type = $_FILES['jpg-file']['type'];
    $file_size = $_FILES['jpg-file']['size'];
    $file_tmp_name = $_FILES['jpg-file']['tmp_name'];

```


## Filtering by a Tag - Query String Parameters
> Plan the query string for filtering by a tag for the "view all" pages.
> (This plan should be exactly the same for both the consumer and admin views.)
> Include the query string parameter and its value.
> Document the value with the field from your database in all CAPITOL letters.

Example: `?category=ID` where `ID` is the `id` field from the `categories` table.

?tag_id=ID


## Filtering by a Tag - SQL Query Plan
> Plan the SQL query to retrieve all entries with a specific tag using the query string parameter.

```
"SELECT posts.id AS 'posts.id',
  posts.title AS 'title',
  posts.description AS 'description',
  tags.id AS 'tags.id',
  tags.tag_name AS 'tags_name'
  FROM post_tags
  INNER JOIN posts ON (posts.id = post_tags.post_id)
  INNER JOIN tags ON (tags.id = post_tags.tag_id)
  WHERE (tags.id = $filter_param);"
```


## Contributors

I affirm that I have contributed to the team requirements for this milestone.

Consumer Lead: Stephanie Dyer

Admin Lead: Andre Thomas


[← Table of Contents](design-journey.md)
