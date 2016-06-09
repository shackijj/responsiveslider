<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="pl_rs_container" style="visibility: hidden; display: block; overflow: hidden; margin: 0px auto 0px auto; padding: 10px 0px 5px 0px; width: <?=$arParams['CONTAINER_WIDTH']?>%;">
<!-- Jssor Slider Begin -->
<!-- You can move inline styles to css file or css block. -->
	<div id="slider2_container" style="position: relative; margin: 0; float: left; top: 0px; left: 0px; width: <?=$arParams['SLIDE_WIDTH']?>px;
		height: <?=$arParams['SLIDE_HEIGHT']?>px; overflow: hidden;">
		<!-- Slides Container -->
		<div data-u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: <?=$arParams['SLIDE_WIDTH']?>px; height: <?=$arParams['SLIDE_HEIGHT']?>px;
			overflow: hidden;">
		<? foreach ($arResult["COLLECTION_ITEMS"] as $key => $item): ?>
			<div id="pl_rs_slide<?=$key?>">
				<? if ($key == 0): ?>
					<img id="pl_rs_image<?=$key?>" data-u="image" src="<?=$item['PATH']?>" alt="<?=$item['DESCRIPTION']?>">
					<? unset($arResult["COLLECTION_ITEMS"][$key]); ?>
				<?else:?>
					<img id="pl_rs_image<?=$key?>" data-u="image" data-src2="<?=$item['PATH']?>" alt="<?=$item['DESCRIPTION']?>">
				<?endif;?>
				<div class="slide_content" id="pl_slide<?=$key?>_content">
				</div>
			</div>
		<? endforeach; ?>
		</div>
		<!-- Trigger -->
		<script>
			BX.ready( function () {
				jssor_slider2_starter = function (containerId) {

					var _CaptionTransitions = [];

					var options = {
						$AutoPlay: true,                                   
						$DragOrientation: 3,
						$LazyLoading: 1,
						$AutoPlayInterval: <?=$arParams['AUTOPLAY_DELAY']?>,
						$CaptionSliderOptions: {                           
							$Class: $JssorCaptionSlider$,                  
							$CaptionTransitions: _CaptionTransitions,       
							$PlayInMode: 1,                                 
							$PlayOutMode: 3                                 
						}
					};

					var jssor_slider2 = new $JssorSlider$(containerId, options);
					function ScaleSlider() {

						var paddingWidth = 0;

						var minReserveWidth = 225;

						var parentElement = jssor_slider2.$Elmt.parentNode;

						var parentWidth = parentElement.clientWidth;

						if (parentWidth) {

							var availableWidth = parentWidth - paddingWidth;

							var sliderWidth = availableWidth * 1;

							sliderWidth = Math.min(sliderWidth, <?=$arParams['MAX_WIDTH']?>);

							sliderWidth = Math.max(sliderWidth, <?=$arParams['MIN_WIDTH']?>);
							var clearFix = "none";

							if (availableWidth - sliderWidth < minReserveWidth) {

								sliderWidth = availableWidth;
								sliderWidth = Math.max(sliderWidth, <?=$arParams['MIN_WIDTH']?>);

								clearFix = "both";
							}
							var toClearElment = $Jssor$.$GetElement("clearFixDiv");
							toClearElment && $Jssor$.$Css(toClearElment, "clear", clearFix);

							jssor_slider2.$ScaleWidth(sliderWidth);
						}
						else
							$Jssor$.$Delay(ScaleSlider, <?=$arParams['SCALE_DELAY']?>);
					}

					function ShowSlider() {
						var parentElement = jssor_slider2.$Elmt.parentNode;
						parentElement.style.visibility = "visible";
					}

					ScaleSlider();
					ShowSlider();
					$Jssor$.$AddEvent(window, "load", ScaleSlider);
					$Jssor$.$AddEvent(window, "load", ShowSlider);
					$Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
					$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
				};
				
				
				jssor_slider2_starter('slider2_container');
			});
		</script>
	</div>
	<!-- Jssor Slider End -->
</div>
