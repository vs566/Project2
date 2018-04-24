<h1>Add Task Page</h1>
<br><br><br>

<form method="post" action = "?controller=todo&action=newTask"  >

    <div id="form">
        <br>
        <label for="duedate">Due Date:</label>
        <input type="date" name="duedate" id="duedate" required><br>
        <label for="message">Message:</label>
        <input type="text" name="message" id="message" required><br>
        <input id= "button" type="submit">
        <input id= "reset" type="reset">
    </div>
</form>

