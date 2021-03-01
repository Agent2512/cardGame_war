<main id="index">
    <header>
        <h1>WAR</h1>
    </header>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <div class="inputField">
            <label for="username">Username</label>
            <input type="text" required id="username" name="username" placeholder="Username">
        </div>

        <div class="inputField">
            <label for="password">Join Room</label>
            <input type="text" id="password" name="password" placeholder="Room Password">
            <input type="submit" value="Join Room">
        </div>

        <div class="inputField">
            <label for="create">Create Room</label>
            <input type="submit" id="create" name="create" value="Create Room">
        </div>
    </form>
</main>