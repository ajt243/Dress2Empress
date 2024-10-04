# Project 3, Milestone 2: **Administrator** Design Journey

[← Table of Contents](../design-journey.md)


## Milestone 1 Feedback Revisions
> Explain what you revised in response to the Milestone 1 feedback (1-2 sentences)
> If you didn't make any revisions, explain why.

I didnt make any because I feel that it is currently and efficient way of retreiving queries, but I will modify to meet the assignment requirements for future milestones and 

## Edit Page URL
> Design the URL for the administrator's edit page.
> What is the URL for the administrator's edit page?

/edit?id=$_GET['id']

> What query string parameters will you include in the URL?

| Query String Parameter Name       | Description       |
| --------------------------------- | ----------------- |
| 'id'                              | The unique identifier of the post to be edited.|



## SQL Query Plan
> Plan the SQL query to retrieve a record from one of your query string parameters.

```
SELECT * FROM posts WHERE id = :id;
```

> Plan the SQL query to retrieve all tag names for a specific record.

```
SELECT tags.tag_name
FROM tags
INNER JOIN post_tags ON tags.id = post_tags.tag_id
WHERE post_tags.post_id = :entry_id;
```


## Contributors

I affirm that I am submitting my work for the administrator requirements in this milestone.

Admin Lead: Andre Thomas


[← Table of Contents](../design-journey.md)
