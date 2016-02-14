    <nav class="<?php echo $CLASS_NAVBAR; ?>">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href="./">
            <i class="glyphicon glyphicon-th-large"></i> <strong>OSAVP</strong>
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="<?php echo $CLASS_NAV; ?>">
            <li <?php if (isset($_GET['home'])) {echo 'class="active"';} ?>><a href="./?home"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <!-- <li><a href="?page=2"><i class="glyphicon glyphicon-search"></i> Search</a></li> -->
            <li <?php if (isset($_GET['help'])) {echo 'class="active"';} ?>><a href="./?help"><i class="glyphicon glyphicon-education"></i> Help</a></li>
          </ul>



        <form class="navbar-form navbar-right" role="search" action="./?search" enctype="multipart/form-data" method="POST">
        <div class="input-group">
            <input type="text" class="form-control" id="searchwordID" name="searchword" placeholder="Search" >
            <div class="input-group-btn">
                <button class="btn btn-default" name="search" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
        </form>

<!--

    <div class="col-sm-3 col-md-3">
        <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="q">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>

	<center>
		<i class="glyphicon glyphicon-thumbs-up"></i> 0 likes  - 
		<i class="glyphicon glyphicon-comment"></i> 0 comments  
        <i class="glyphicon glyphicon-user"></i> 0 Users
        <div class="pull-right">  <span class="label label-important">18+</span></div>
	<div class="muted">
	Regions Online: <b>0</b> | 
	Populated Regions: <b>0</b> | 
	Avatars Online: <b>0</b> 
	</div>
    &#128269;
	</center>
    
        <form class="navbar-form navbar-right" role="search" action="./?search" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" id="searchwordID" name="searchword" placeholder="Terminal">
            </div>
            <button id="Submit" name="search" type="submit" class="btn btn-default">
                <i class="glyphicon glyphicon-search"></i> Search
            </button>
        </form>

-->

        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    
