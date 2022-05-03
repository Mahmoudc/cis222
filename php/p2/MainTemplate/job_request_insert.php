<div class="container">
    <br>
    <form class="form-horizontal" action="MainTemplate/controller.php?option=7" method='post'>

        <label class="control-label col-2" for="projectName">
        Project name:
        </label>
        <input type="text" class="col-5"  name="projectName" id="projectName"  required>
        <br>
        <label for="projectDescription" class="control-label col-2">
        Project Description:
        </label>
        <br>
        <textarea name="projectDescription" id="projectDescription" rows="8" class="col-5 offset-2" required>
    </textarea>
        <br>
        <br>

        <label for="projectDeadline" class="control-label col-2">
        Project deadline:
        </label>
        <input type="date" name="projectDeadline" id="projectDeadline" class="col-5">
        <br>
        <hr>
        <h1 class='col-1'>Budget</h1>

        <br>
        <label for="MaximumCostInput" class="control-label col-2">
        Maximum cost:
        </label>
        <input type="text" name="maximumCost" id="maximumCostInput" class="col-5" >
        <br>
        <label for="MinimumCost" class="control-label col-2">
            Minimum cost:
        </label>
        <input type="text" name="minimumCost" id="MinimumCost" class="col-5" >
        <br>
        <br>
        <input type="submit" class="btn btn-primary offset-4" id="submit" value="Submit">


    </form>
</div>
<a href='?page=jobRequest&request=home' class='btn btn-primary'>Go back to home</a>
