<h2>Discard CV</h2>
<p>Are you sure to discard the CV with subject "<?php echo $cv['Subject'].'" (ID: '.$cv['CID'].')'; ?>?</p>
<p>Note: All "Applications" relating to this job will be discarded, this cannot be undone!</p>
<br />
<?php
echo anchor('applicant/cv/discard_confirmed/'.$cv['CID'], 'Discard');
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
echo anchor('applicant/managecvs', 'Cancel');
?>
