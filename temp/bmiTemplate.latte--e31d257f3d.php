<?php
// source: template/bmiTemplate.latte

use Latte\Runtime as LR;

class Templatee31d257f3d extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico">
    <title><?php echo LR\Filters::escapeHtmlText($title) /* line 7 */ ?></title>  
</head>

<body>
<?php
		$weightmin = 10;
		$weightmax = 250;
?>

<?php
		$heightmax = 250;
		$heightmin = 50;
?>

<?php
		$agemin = 18;
		$agemax = 100;
?>

    <div class="container">
        <h1><?php echo LR\Filters::escapeHtmlText($title) /* line 21 */ ?></h1>
        <form method="POST">
            <div class="form-container">
                <label for="sweight">Weight:</label>
                <input type="range" name="sweight" id="sweight"<?php
		$_tmp = ['value' => $weight, 'min' => $weightmin, 'max' => $weightmax];
		echo LR\Filters::htmlAttributes(isset($_tmp[0]) && is_array($_tmp[0]) ? $_tmp[0] : $_tmp);
?>>
                <div class="input-box">
                    <span>kg</span>
                    <input type="number" name="nweight" id="nweight"<?php
		$_tmp = ['min' => $weightmin, 'max' => $weightmax];
		echo LR\Filters::htmlAttributes(isset($_tmp[0]) && is_array($_tmp[0]) ? $_tmp[0] : $_tmp);
?>>
                </div>
            </div>
        
            <div class="form-container">
                <label for="sheight">Height:</label>
                <input type="range" name="sheight" id="sheight"<?php
		$_tmp = ['value' => $height, 'min' => $heightmin, 'max' => $heightmax];
		echo LR\Filters::htmlAttributes(isset($_tmp[0]) && is_array($_tmp[0]) ? $_tmp[0] : $_tmp);
?>>
                <div class="input-box">
                    <span>cm</span>
                    <input type="number" name="nheight" id="nheight"<?php
		$_tmp = ['min' => $heightmin, 'max' => $heightmax];
		echo LR\Filters::htmlAttributes(isset($_tmp[0]) && is_array($_tmp[0]) ? $_tmp[0] : $_tmp);
?>>
                </div>
            </div>

            <div class="form-container">
                <label for="sage">Age:</label>
                <input type="range" name="sage" id="sage"<?php
		$_tmp = ['value' => $age, 'min' => $agemin, 'max' => $agemax];
		echo LR\Filters::htmlAttributes(isset($_tmp[0]) && is_array($_tmp[0]) ? $_tmp[0] : $_tmp);
?>>
                <input type="number" name="nage" id="nage"<?php
		$_tmp = ['min' => $agemin, 'max' => $agemax];
		echo LR\Filters::htmlAttributes(isset($_tmp[0]) && is_array($_tmp[0]) ? $_tmp[0] : $_tmp);
?>>
            </div>

            <button type="submit" name="submit" class="submitbtn">Calculate your BMI</button>
        </form>

<?php
		if (isset($_POST["submit"])) {
			$iterations = 0;
			foreach (range(0,6) as $age_group_index) {
				$age_group = $age_group_index - 2;
				if ($age_group_index > ($age-4)/10) break;
				$iterations++;
			}
?>

<?php
			$limits = range(19, 29, 5);
			$limits[-1] = end($limits) + 10;
			$status = 4;
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($limits) as $limit) {
				if ($bmi < ($limit + $age_group)) {
					$status = ($iterator->counter - 1);
					if (true) break;
				}
				$iterations++;
			}
			array_pop($this->global->its);
			$iterator = end($this->global->its);
?>

            <div class="results">
                <h2> Your BMI: <span class="bmi"><?php echo LR\Filters::escapeHtmlText($bmi) /* line 67 */ ?></span></h2>
                <div class="graph">
                    <div class="arrow" id="arrow"></div>
                    <div class="start" style="left: 0">15</div>
                    <div class="end" style="right: 0">50+</div>
                    <div class="grad"></div>
                </div>
                <div class="status" style="color: #<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeCss($colors[$status])) /* line 74 */ ?>"><?php
			echo LR\Filters::escapeHtmlText($status_arr[$status]) /* line 74 */ ?></div>
            </div>
<?php
		}
?>
    </div>

    <div class="credits">
        <span>Background image by </span>
            <a href="https://libreshot.com/cs/health-fitness-concept/">Martin Vorel</a>
    </div>

    <script async>
        var wslider = document.getElementById("sweight");
        var wnumber = document.getElementById("nweight");
        wnumber.value = wslider.value;
        wslider.oninput = () => wnumber.value = wslider.value;
        wnumber.oninput = () => wslider.value = wnumber.value;

        var hslider = document.getElementById("sheight");
        var hnumber = document.getElementById("nheight");
        hnumber.value = hslider.value;
        hslider.oninput = () => hnumber.value = hslider.value;
        hnumber.oninput = () => hslider.value = hnumber.value;

        var aslider = document.getElementById("sage");
        var anumber = document.getElementById("nage");
        anumber.value = aslider.value;
        aslider.oninput = () => anumber.value = aslider.value;
        anumber.oninput = () => aslider.value = anumber.value;

        var arrow = document.getElementById("arrow");
        var bmi = <?php echo LR\Filters::escapeJs($bmi) /* line 104 */ ?>;
        var min = 15;
        var max = 50;
        var calc = (bmi - min) * 100 / (max - min);
        if(arrow !== null) arrow.style.left = (calc <= 100 ? (calc > 0 ? calc : 0) : 100) + "%";
    </script>

</body> 
</html><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['age_group_index'])) trigger_error('Variable $age_group_index overwritten in foreach on line 51');
		if (isset($this->params['limit'])) trigger_error('Variable $limit overwritten in foreach on line 59');
		
	}

}
