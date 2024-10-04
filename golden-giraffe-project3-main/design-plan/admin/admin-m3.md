# Project 3, Milestone 3: **Administrator** Design Journey

[← Table of Contents](../design-journey.md)


## Milestone 2 Feedback Revisions
> Explain what you individually revised in response to the Milestone 1 feedback (1-2 sentences)
> If you didn't make any revisions, explain why.

none as i did not lose any points in the previous milestone.

## Edit Form - UPDATE query
> Plan your query to update an entry in your catalog.

```sql
 $update = exec_sql_query(
    $db,
    "UPDATE posts SET title = :title, description = :description, img_source = :img_source WHERE id = :id",
      array(
        ':title' => $form_values["title"],
        ':description' => $form_values["description"],
        ':img_source' => $upload_source,
        ':id' => $entry_id
        )
```


## Edit Form - Sample Test Data
> Document sample test data to edit an entry in your catalog.
> Upload a sample file to the `design-plan/admin` folder for us to upload when editing the entry.

**Sample Edit Data:**
  - Title: "Debonair Office Wear"
  - Description: "This outfit is fun, sophisticated, and suitable for most offices or workplaces"
  - Tags: Casual, Business

**Sample Upload File:** `design-plan/admin/office.jpg`


## Contributors

I affirm that I am submitting my work for the administrator requirements in this milestone.

Admin Lead: Andre Thomas


[← Table of Contents](../design-journey.md)
