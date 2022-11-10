<?php
// Make a DateTime object with the current date and time
$today = new DateTime();

// Make an empty array to contain the hours
$aHours = array();

// Make another DateTime object with the current date and time
$oStart = new DateTime('now');

// Set current time to midnight
$oStart->setTime(0, 0);

// Clone DateTime object (This is like 'copying' it)
$oEnd = clone $oStart;

// Add 1 day (24 hours)
$oEnd->add(new DateInterval("P1D"));

// Add each hour to an array
while ($oStart->getTimestamp() < $oEnd->getTimestamp()) {
    $aHours[] = $oStart->format('H');
    $oStart->add(new DateInterval("PT1H"));
}

// Create an array with halfs
$halfs = array(
    '0',
    '30',
);

// Get the current quarter
$currentHalf = $today->format('i') - ($today->format('i') % 30);
?>

<select name="" id="">
    <option value="-1">Choose a time</option>
    <?php foreach ($aHours as $hour): ?>
        <?php foreach ($halfs as $half): ?>
            <option value="<?= sprintf("%02d:%02d", $hour, $half); ?>" <?= ($hour == $today->format('H') && $half == $currentHalf) ? 'selected' : ''; ?>>
                <?= sprintf("%02d:%02d", $hour, $half); ?>
            </option>
        <?php endforeach; ?>
    <?php endforeach; ?>
</select>