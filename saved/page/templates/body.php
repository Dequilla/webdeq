<div class="header">
  <div class="header-body">
    <h1>WEBDEQ</h1>
    <h2>TAKES YOU WHERE YOU WANT TO GO</h2>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="column">
      <h1>Webdeq</h1>
      <p>
        This project is mostly for fun, i will be developing a MVC-framework for maintaining a website for myself. But you are welcome to use the framework to, as long as you follow the licensing rules.
      </p>

      <h2>Licensing</h2>
      <p>
        Do whatever you want but I want my name and a link to my github staying there, and it should be stated if the distributed version is modified by any means.
      </p>
      <p>
        Edwin whalin<br />
        Github: <a href="https://github.com/Dequilla">https://github.com/Dequilla</a><br />
        Website: <a href="http://dequilla.com">http://dequilla.com</a> or <a href="http://dequilla.com">http://edwinwallin.com</a><br />
        Email: <a href="mailto:edwin.wallin@dequilla.com">edwin.wallin@dequilla.com</a>
      </p>

      <h2>Installing</h2>
      <p>
        <strong>Requires a PHP enabled server</strong><br />
        Clone or download the project and set your servers webroot to webdeqs public folder (or symlink to it) and it should work.<br />
        <a href="https://github.com/Dequilla/webdeq/releases">Download</a><br />
        <a href="https://github.com/Dequilla/webdeq">Clone</a>
      </p>

      <h2>Usage</h2>
      <h3>Routes</h3>
      <p>
        In <code>saved/page/pages/routes.php</code> you can set your urls, example: <code>'/home' => 'home.php'</code>.
        The files you reference to (in this case, <code>home.php</code>) in your urls, shuld be located in (or in a subdirectory of) the <code>saved/page/pages</code> directory.
      </p>

      <h3>pages</h3>
      <p>
        The <code>saved/page/pages</code> directory contain the files you reference to in your <code>routes.php</code> file. they contain the code that the web browser will read. These files can also contain links to template files.
      </p>

      <h3>Templates</h3>
      <p>
        Templates are stored in the <code>saved/page/templates</code> directory, they are files that can be included in your pages.
      </p>

      <h4>Example</h4>
      <p>
        In the file <code>saved/page/pages/index.php</code> you can include the files <code>saved/page/templates/header.php</code> and <code>saved/page/templates/footer.php</code> by typing <code>&#60;+header;</code> and <code>&#60;+footer;</code> without the .php extention.
      </p>
      <p>File: <code>saved/page/pages/index.php</code></p>
<pre><code>&lt;+header;
  &lt;h1&gt;Some text&lt;/h1&gt;
&lt;+footer;
</code></pre>

      <p>File: <code>saved/page/templates/header.php</code></p>
<pre><code>&lt;html&gt;
&lt;head&gt;
  &lt;title&gt;Page Title&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
</code></pre>

      <p>File: <code>saved/page/templates/footer.php</code></p>
<pre><code>&lt;/body&gt;
&lt;/html&gt;
</code></pre>

      <p>Generated file (the file loaded by the browser): <code>saved/page/generated/index.php</code></p>
<pre><code>&lt;html&gt;
&lt;head&gt;
  &lt;title&gt;Page Title&lt;/header&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;h1&gt;Some text&lt;/h1&gt;
&lt;/body&gt;
&lt;/html&gt;
</code></pre>

      <h3>Logging</h3>
      <p>
        Logging currently takes care of itself, to logg something in your own code use <code>require_once('../http/utility/logger.php');</code> and use one of two functions: <code>deq_log_message</code> or <code>deq_log_error</code> with error string as parameter, it automaticly saves the request IP and what time and date it logged on. The logs are available in <code>saved/logs</code>.
      </p>

      <h3>Settings</h3>
      <p>
        There are currently a few settings available in <code>http/settings/settings.php</code>.
      </p>
      <p>
        <code>CACHING_ENABLED</code>: Currently useless. Will be used to set wether to always generate new pages or if it saves generated pages. <code>LOGGING_ENABLED</code>: set to true to log, false to not log. <code>LOG_DIR</code>: The directory which the logger saves the logs to. <code>DEFAULT_TIMEZONE</code>: Sets what timezone you want the system to operate from.
      </p>

      <h2>Vagrant (Experimental, you will have bugs)</h2>
      <p>
        To make development easier, I have put together a lightweight vagrant box with Ubuntu 16.04 server and a LEMP stack.
      </p>
      <p>
        To use this download vagrant via <a href="https://www.vagrant.com/downloads.html"> https://www.vagrant.com/downloads.html</a> and install it. Create a folder where you want to have your enviorment. Download and place <a href="http://dequilla.com/resources/vagrant/vagrant-ubuntu16.04-webdeq.box"> http://dequilla.com/resources/vagrant/vagrant-ubuntu16.04-webdeq.box</a> in the folder you just created. Open a terminal and go to your folder and type: <code>vagrant box add webdeq-box vagrant-ubuntu16.04-webdeq.box</code>. Next write: <code>vagrant init webdeq-box</code> and now you should have a setup enviorment.
      </p>
      <p>
        To use it just go to the vagrant folder and write <code>vagrant</code> up to start the vagrant-box.
      </p>
      <p>
        Browser address to access the box webroot: localhost:8080 The ssh port is usually 2222 but could be different, check <code>vagrant</code> up output.
      </p>
      <p>
        The vagrant box does not come with webdeq by default so just clone the project into the <code>shared/your-site-name-folder/</code> folder.
      </p>
    </div>
  </div>
</div>
