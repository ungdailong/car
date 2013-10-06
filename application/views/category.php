<!-- categoreis -->
<div class="boxCategories">
	<h4 class="titlebar"><?php echo $path == '/xe-moi/' ? 'Xe mới' : 'Xe đã sử dụng' ?></h4>
	<ul class="categories">
	<?php  if($path=='/xe-qua-su-dung/') echo '<li><a href="http://mercedeshcm.vn/xe-qua-su-dung/proven-exclusivity">Proven Exclusivity </a>
					</li>';?>
		<?php foreach ($category[0] as $index => $value){?>
		<li><a href="<?php echo WEB_ROOT.$path. $value['uri']?>"><?php echo $value['name']?> <?php echo isset($countCarsByCat[$value['caid']]) ? '('.$countCarsByCat[$value['caid']]['countt'].')' : ''?></a>
			<?php if(isset($category[$value['caid']]) && count($category[$value['caid']]) > 0) {?>
			<ul>
				<?php foreach ($category[$value['caid']] as $index1 => $value1){?>
				<li><a href="<?php echo WEB_ROOT.$path. $value['uri'].'/'.$value1['uri']?>"><?php echo $value1['name']?> <?php echo isset($countCarsByCat[$value1['caid']]) ? '('.$countCarsByCat[$value1['caid']]['countt'].')' : ''?></a></li>
				<?php }?>

			</ul>
			<?php }?>
		</li>
		<?php }?>

	</ul>
</div>
<!-- en categories -->