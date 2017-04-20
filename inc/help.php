<section>

<article>
    <h1><?php echo $osavatarpicker; ?><span class="pull-right">Help</span></h1>
    Coming soon ...
</article>

<article>
    <h2>Features</h2>
    <h3>Outworld (frontend):</h3>
    Avatar List<br />
    Avatar Search<br />
    <h3>Inword:</h3>
    Avatar Picker<br />
    <a class="btn btn-default btn-success btn-xs" href="inc/avatars-picker.php" target="_blank">
    <i class="glyphicon glyphicon-eye-open"></i> Demo</a>
</article>

<article>
    <h2>Requirment</h2>
    Mysql, Php5, Apache<br />
</article>

<article>
    <h2>Download</h2>
    <a class="btn btn-default btn-success btn-xs" href="https://github.com/djphil/osavatarpicker" target="_blank">
    <i class="glyphicon glyphicon-save"></i> GithHub</a> Source Code
</article>

<article>
    <h2>Install</h2>
    <?php echo $osavatarpicker; ?> have a "special" page for viewers (inc/avatars-picker.php)<br />
    <h3>Robust.ini</h3>
    <pre>
    [LoginService]
    ; For V3 avatar picker (( work in progress ))
    AvatarPicker = "${Const|BaseURL}/osavatarpicker/inc/avatars-picker.php"</pre>
    <h3>config.php</h3>
    <pre>configure all variables inside osavatarpicker/inc/config.php</pre>
</article>

<article id="AddRegion">
    <h2>Add Avatar</h2>
    Only the server administrator is authorised to add a avatar to the OpenSim Avatar Picker.
    <h3>Inworld:</h3>
    <ol>
        <li>Create a new account for a "Master Avatar".</li>
        <li>Go to inworld with the Master Avatar.</li>
        <li>Create a new folder called "wear_folder" at root of the Master Avatar Inventory.</li>
        <li>Create a folder inside the "wear_folder" called with the desired name for the Avatar (eg: "Big Buck Bunny")
        </li>
        <li>Create the 4 Avatar Body Parts and some Clothes you whant for this avatar.</li>
    </ol>
    <h3>Outworld:</h3>
    <ol>
        <li>Go to "img" folder and put inside all images for yours avatars<br />
            The images names must match the names of the avatars folders.<br />
            The recommended size for the image of the avatar is 750px x 750px 72dpi.
        </li>
    </ol>
</article>

<article>
    <h2>License</h2>
    GNU/GPL General Public License v3.0<br />
</article>

<article>
    <h2>Credit</h2>
    Philippe Lemaire (djphil)
</article>

<article>
    <h2>Donation</h2>
    <p><?php include_once("inc/paypal.php"); ?></p>
</article>

</section>
