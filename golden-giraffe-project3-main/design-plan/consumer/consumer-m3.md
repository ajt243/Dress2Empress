# Project 3, Milestone 3: **Consumer** Design Journey

[← Table of Contents](../design-journey.md)


## Milestone 2 Feedback Revisions
> Explain what you individually revised in response to the Milestone 1 feedback (1-2 sentences)
> If you didn't make any revisions, explain why.

I had an a element losely and I recieved feedback to place it inside an li element.


## Insert Form - INSERT query
> Plan your query to insert an entry in your catalog.

```sql
        $result =
          exec_sql_query(
            $db, "INSERT INTO
      posts(title,description) VALUES (:title,:description)",
        array(
          ':title' => $form_values['title'],
          ':description' => $form_values['description']
        )
          )

```



## Insert Form - Sample Test Data
> Document sample test data to insert an entry in your catalog.
> Upload a sample file to the `design-plan/consumer` folder for us to upload when inserting the entry.

**Sample Insert Data:**

  - Title: "Cute Denim Skirt"
  - Description: "This skirt is the perfect bottom for slope day
  - Tags: Bottoms & Casual

**Sample Upload File:** `design-plan/consumer/sample_img.jpg`


## Contributors

I affirm that I am submitting my work for the consumer requirements in this milestone.

Consumer Lead: Stephanie Dyer


[← Table of Contents](../design-journey.md)
