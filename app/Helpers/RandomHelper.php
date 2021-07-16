<?php

  // Active menu
  function setActive($path)
  {
      return Request::is($path) ? 'active' : '';
  }
?>
