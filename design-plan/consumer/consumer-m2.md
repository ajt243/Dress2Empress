# Project 3, Milestone 2: **Consumer** Design Journey

[← Table of Contents](../design-journey.md)


## Milestone 1 Feedback Revisions
> Explain what you revised in response to the Milestone 1 feedback (1-2 sentences)
> If you didn't make any revisions, explain why.

I revised my query so that the retrieving all entries does not have a JOIN clause.


## Details Page URL
> Design the URL for the consumer's detail page.
> What is the URL for the detail page?

/view?id=$_GET['id']

> What query string parameters will you include in the URL?

| Query String Parameter Name       | Description       |
| --------------------------------- | ----------------- |
| id | Identifies the specific post to be retireved  |


## SQL Query Plan
> Plan the SQL query to retrieve a record from one of your query string parameters.

```
$display = $_GET['id'];

$result = exec_sql_query(
    $db,
    "SELECT * FROM posts WHERE (posts.id = :id) ",
    array(':id' => $display)
);

$records = $result->fetchAll();
```

> Plan the SQL query to retrieve all tag names for a specific record.

```
        $post_id = $record["id"];

        $res = exec_sql_query(
            $db,
            "SELECT * FROM post_tags INNER JOIN tags ON (tags.id = post_tags.tag_id) WHERE (post_id = $post_id);"
        );

        $tags = $res->fetchAll();

```


## Contributors

I affirm that I am submitting my work for the consumer requirements in this milestone.

Consumer Lead: Stephanie Dyer


[← Table of Contents](../design-journey.md)
