<?php

namespace App\Classes;

use PDF;

class InvoicePdf {

  public static function setFont() {
    PDF::setHeaderFont(Array('freeserif', '', 12));
    PDF::setFooterFont(Array('freeserif', '', 10));
    PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    PDF::SetMargins(15, 10, 15);
    PDF::SetHeaderMargin(5);
    PDF::SetFooterMargin(10);
    PDF::SetAutoPageBreak(TRUE, 25);
    PDF::SetFont('freeserif', '', 12);
    PDF::setFontSubsetting(false);
  }

}
