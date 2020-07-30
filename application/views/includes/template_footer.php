<?php
$seo = 'include_areas/' . $active_tab . '_seo.php';
if (file_exists($seo)) {
    require_once $seo;
}
?>
</div>
</div>
<footer class="page-footer">
    <div class="wrapper page-footer__wrapper">
        <div class="copyright">
            <span class="copyright__part copyright__lifetime">Copyright ©2007-<?php echo date("Y") ?></span>
            <span class="copyright__part copyright__company-lifetime"><b>© "Company"</b>, <?php echo date("Y") ?></span>
            <img class="copyright__image" src="assets/img/logo.png" alt="Company-logo">
            <span class="copyright__part copyrhigt__company-name">Company</span>
        </div>
        <nav class="footer-nav">
            <ul class="footer-nav__list">
                <?php foreach ($menu_items as $item): ?>
                <li class="footer-nav__list-item"><a class="footer-nav__link" href="<?php echo $item['resource_name'] ?>.php"><?php echo $item['item_name'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="developer">
            <span class="developer__ref">Разработка сайта - <a class="developer__link" href="http://itconstruct.ru">ITConstruct</a></span>
            <img class="counter" src="assets/img/counter.png" alt="Page-counter">
        </div>
    </div>
</footer>