<?php  
//var_dump(Auth::user());

if (Auth::check()) {    
    $userName = Auth::user();
    $userInfo = User::findUserByEmail($userName);
}

?>

<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Instrument Exchange</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    
                    <? if (Auth::check()) { ?>
                            <ul class="nav navbar-nav navbar-left">
                                <li class="active"><a>Hi, <?= $userInfo[0]['name']; ?>!</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="ads.create.php">List Your Item</a></li>
                                <li><a href="#">Edit/Delete Listings</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        <? } else { ?>
                            <ul class="nav navbar-nav navbar-left">
                                <li class="active"><a href="login.php">Log In / Sign Up</a></li>
                            </ul>
                    <? }; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

