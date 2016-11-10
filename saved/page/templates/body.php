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
        Do whatever you want but we want our names, links to github and mails staying there, and it should be stated if the distributed version is modified by any means.
      </p>
      <p>
        Edwin Wallin<br />
        Github: <a href="https://github.com/Dequilla">https://github.com/Dequilla</a><br />
        Website: <a href="http://dequilla.com">http://dequilla.com</a> or <a href="http://dequilla.com">http://edwinwallin.com</a><br />
        Email: <a href="mailto:edwin.wallin@dequilla.com">edwin.wallin@dequilla.com</a>
      </p>
      <p>
        Pontus Nilson<br />
        Github: <a href="https://github.com/tazthemaniac">https://github.com/tazthemaniac</a><br />
        Website: <a href="http://pontusnilsson.com">http://pontusnilsson.com</a> or <a href="http://tazthemaniac.com">http://tazthemaniac.com</a><br />
        Email: <a href="mailto:pontus_nilsson_92@hotmail.com">pontus_nilsson_92@hotmail.com</a>
      </p>

      <h2>Installing</h2>
      <p>
        <strong>Requires a PHP enabled server (only tested on PHP7 and nginx server)</strong><br />
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

      <h3>Pages</h3>
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
  &lt;title&gt;Page Title&lt;/title&gt;
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
        <code>CACHING_ENABLED</code>: Sets wether to always generate new pages or if it saves generated pages.<br />
        <code>LOGGING_ENABLED</code>: Set to true to log, false to not log.<br />
        <code>LOG_DIR</code>: The directory which the logger saves the logs to.<br />
        <code>DEFAULT_TIMEZONE</code>: Sets what timezone you want the system to operate from.
      </p>
    </div>
  </div>
</div>
