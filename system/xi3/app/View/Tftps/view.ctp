<!--
Copyright: Gianluca Costa & Andrea de Franceschi 2007-2010, http://www.xplico.org
 Version: MPL 1.1/GPL 2.0/LGPL 2.1
-->
<script language="JavaScript">
    function popupVetrina(whatopen) {
      newWindow = window.open(whatopen, 'popup_vetrina', 'width=520,height=550,scrollbars=yes,toolbar=no,resizable=yes,menubar=no');
      return false;
    }
</script>

<div class="generic">
<div id="messageframe">
<table class="headers-table" summary="Message headers" cellpadding="2" cellspacing="0">

<tbody><tr>
<td class="header-title"><?php echo __('Url:'); ?>&nbsp;</td>
<td class="subject" width="90%"><?php echo $tftp['Tftp']['url']?></td>
</tr>
<tr>
<td class="header-title"><?php echo __('Commands:'); ?>&nbsp;</td>
<td class="date" width="90%"><A href="#" onclick="popupVetrina('/tftps/cmd','scrollbar=auto'); return false"><?php echo __('cmd.txt'); ?></A></td>
</tr>
<tr>
<td class="header-title"><?php echo __('Info:'); ?>&nbsp;</td>
<td class="date pinfo" width="90%"><a href="#" onclick="popupVetrina('/tftps/info','scrollbar=auto'); return false"><?php echo __('info.xml'); ?></a></td>
</tr>
<tr>
<td class="header-title"><?php echo __('PCAP:'); ?>&nbsp;</td>
<td class="date pinfo" width="90%"><?php echo $this->Html->link('pcap', 'pcap/'); ?></td>
</tr>

</tbody></table>

<table id="messagelist" cellpadding="2" cellspacing="0">
<tr>
<th><?php echo $this->Paginator->sort('capture_date', __('Date')); ?></th>
<th><?php echo $this->Paginator->sort('filename', __('Name')); ?></th>
<th><?php echo $this->Paginator->sort('file_size', __('Size')); ?></th>
<th><?php echo $this->Paginator->sort('dowloaded', __('Dir')); ?></th>
<th>Info</th>
</tr>
<?php foreach ($tftp_file as $data_file): ?>
<tr>
<td><?php echo $data_file['Tftp_file']['capture_date']; ?></td>
<td><?php echo $this->Html->link($data_file['Tftp_file']['filename'], 'data_file/' . $data_file['Tftp_file']['id']); ?></td>
<td><?php echo $data_file['Tftp_file']['file_size']; ?></td>
<td><?php if ($data_file['Tftp_file']['dowloaded']) echo 'down'; else echo 'up'; ?></td>
<td class="pinfo"><a href="#" onclick="popupVetrina('/tftps/info_data/<?php echo $data_file['Tftp_file']['id']; ?>','scrollbar=auto'); return false"><?php echo __('info.xml'); ?></a><div class="ipcap"><?php echo $this->Html->link('pcap', 'pcap/'.$data_file['Tftp_file']['id']); ?></div></td>
</tr>
<?php endforeach; ?>
</table>
</div>
<table id="listpage" summary="Message list" cellspacing="0">
<tr>
	<th class="next"><?php echo $this->Paginator->prev(__('Previous'), array(), null, array('class'=>'disabled')); ?></th>
       	<th><?php echo $this->Paginator->numbers(); echo '<br/>'.$this->Paginator->counter(); ?></th>
	<th class="next"><?php echo $this->Paginator->next(__('Next'), array(), null, array('class' => 'disabled')); ?></th>
</tr>
</table>
</div>
