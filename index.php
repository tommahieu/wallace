<?php
defined('_JEXEC') or die;

$this->setHtml5(true);

$this->setMetaData('X-UA-Compatible', 'IE=edge', 'http-equiv');
$this->setMetaData('viewport', 'width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes');

$this->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap/dist/css/bootstrap.min.css', 'text/css');
$this->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/ie10-viewport-bug-workaround.css', 'text/css');
$this->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/wpb.css', 'text/css');

JHtml::_('jquery.framework', false, null, false);
$this->addScript($this->baseurl . '/templates/' . $this->template . '/css/bootstrap/dist/js/bootstrap.min.js');
$this->addScript($this->baseurl . '/templates/' . $this->template . '/js/ie10-viewport-bug-workaround.js');
?>
<!DOCTYPE html>
<html xmlns:jdoc="http://www.w3.org/1999/html">
<head>
    <jdoc:include type="head"/>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="<?php echo $this->baseurl . '/templates/' . $this->template . '/images/WPBLogo-mini.svg'; ?>">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <jdoc:include type="modules" name="menu-left"/>
            <ul class="nav navbar-nav navbar-right">
                <jdoc:include type="modules" name="menu-right"/>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<jdoc:include type="modules" name="top"/>
<div class="container">
    <jdoc:include type="message" />
    <jdoc:include type="component"/>
</div>
<jdoc:include type="modules" name="bottom"/>
<div class="footer">
    <div class="container-fluid">
        <jdoc:include type="modules" name="footer"/>
    </div>
</div>
<jdoc:include type="modules" name="debug"/>
</body>
</html>
