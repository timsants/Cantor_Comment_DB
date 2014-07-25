drop table if exists Comments;

create table Comments(CommentID integer PRIMARY KEY, Date datetime, CommentText varchar, 
Name varchar, Telephone varchar, Email varchar, Status varchar, Department varchar, 
Category varchar, Assignee varchar, ContactDate datetime, FollowUpDate datetime);
