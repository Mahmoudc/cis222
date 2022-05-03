<div class="container">
<div class="jumbotron">
    <br>
    <div class="h1">Contact Chahine Software Solutions</div>
<form class="form-horizontal" action="MainTemplate/controller.php?option=1" method='post'>

    <label class="control-label col-2" for="nameInput">
        Name:
    </label>
    <input type="text" class="col-5"  name="Name" id="nameInput" placeholder="Name" required>
    <br>
    <label for="emailInput" class="control-label col-2">
        Email:
    </label>
    <input type="email" class="col-5" name="Email" id="emailInput" placeholder="123@gmail.com" required>
    <br>
    <label for="phoneInput" class="control-label col-2">
        Phone:
    </label>
    <input type="tel" name="phone" id="phoneInput" class="col-5" placeholder="Phone number" required>
    <br>
    <label for="messageInput" class="control-label col-2">
        Message:
    </label>
    <br>
    <textarea name="message" id="messageInput" rows="8" class="col-5 offset-2" required>
    </textarea>
    <br>
    <br>
    <input type="submit" class="btn btn-primary offset-4" id="submit" value="Submit">


</form>
</div>
</div>