<!-- Navbar -->
<nav id="nav-bread" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" id="breadcumText">
      <a href="./" id="breadcumSectionText"><?php echo $moduleName; ?></a>
    </li>
    <?php if ($actionName != "") : ?>
      <li class="breadcrumb-item" id="breadcumText">
        <span id="breadcumActionText"><?php echo $actionName; ?></span>
      </li>
    <?php endif; ?>
  </ol>
</nav>
<!-- End Navbar -->