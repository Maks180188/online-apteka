<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?><div class="bx-hdr-profile bx-hdr-profile-mobile">
<?if (!$compositeStub && $arParams['SHOW_AUTHOR'] == 'Y'):?>
	<div class="bx-basket-block">
		
		<?if ($USER->IsAuthorized()):
			$name = trim($USER->GetFullName());
			if (! $name)
				$name = trim($USER->GetLogin());
			if (strlen($name) > 15)
				$name = substr($name, 0, 12).'...';
			?>
			<a href="<?=$arParams['PATH_TO_PROFILE']?>"><?=htmlspecialcharsbx($name)?></a>
			&nbsp;
			<a href="?logout=yes"><?=GetMessage('TSB1_LOGOUT')?></a>
		<?else:
			$arParamsToDelete = array(
				"login",
				"login_form",
				"logout",
				"register",
				"forgot_password",
				"change_password",
				"confirm_registration",
				"confirm_code",
				"confirm_user_id",
				"logout_butt",
				"auth_service_id",
			);

			$currentUrl = urlencode($APPLICATION->GetCurPageParam("", $arParamsToDelete));
			?>
			<a href="<?=$arParams['PATH_TO_REGISTER']?>?login=yes&backurl=<?=$currentUrl; ?>"><?=GetMessage('TSB1_LOGIN')?></a>
			&nbsp;
			<a href="<?=$arParams['PATH_TO_REGISTER']?>?register=yes&backurl=<?=$currentUrl; ?>"><?=GetMessage('TSB1_REGISTER')?></a>
		<?endif?>
	</div>
<?endif?>
	<div class="bx-basket-block clearfix"><?
		if (!$arResult["DISABLE_USE_BASKET"])
		{
			?>
			<a class="icon-basket" href="<?= $arParams['PATH_TO_BASKET'] ?>"><?//= GetMessage('TSB1_CART') ?></a><?
		}
		if (!$compositeStub)
		{
			if ($arParams['SHOW_NUM_PRODUCTS'] == 'Y' && ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y'))
			{
				echo '<span class="counter-small">'.$arResult['NUM_PRODUCTS'].'</span>'/*.' '.$arResult['PRODUCT(S)']*/;
			}
			if ($arParams['SHOW_TOTAL_PRICE'] == 'Y'):?>
			<br <? if ($arParams['POSITION_FIXED'] == 'Y'): ?>class="hidden-xs"<?endif ?>/>
			<span style="display: none;">
				<?= GetMessage('TSB1_TOTAL_PRICE') ?>
				<? if ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y'):?>
					<strong><?= $arResult['TOTAL_PRICE'] ?></strong>
				<?endif ?>
			</span>
			<?endif;?>
			<?
		}
		if ($arParams['SHOW_PERSONAL_LINK'] == 'Y'):?>
			<div style="padding-top: 4px;">
			<span class="icon_info"></span>
			<a href="<?=$arParams['PATH_TO_PERSONAL']?>"><?=GetMessage('TSB1_PERSONAL')?></a>
			</div>
		<?endif?>
	</div>
</div>