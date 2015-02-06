  <nav>
    <p>Hey, <?php echo $username; ?> ! <span style="text-align:right;"><a href="admin?logout">Sign out</a></span></p>

    <div id="posts">
      <h1><img src="media/images/post-icon.png" alt="Post" title="Create and manage posts"/>Post</h1><div class="break"></div>
      <ul>
        <li><a href="admin/post">List all</a></li>
        <li><a href="admin/create">Create new</a></li>
      </ul>
      <h1><img src="media/images/settings-icon.png" alt="Post" title="Create and manage posts"/>Settings</h1><div class="break"></div>
      <ul>
        <li><a href="admin/settings/general/">General</a></li>
        <li><a href="admin/settings/appearance/">Appearance</a></li>
        <li><a href="admin/settings/widgets/">Widgets</a></li>
      </ul>
    </div>
  </nav>