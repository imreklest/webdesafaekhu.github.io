<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function remove_titik($str){
	$teks = str_replace('.','',$str);;
	return $teks;
}

function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}

function getDayName($dayOfWeek) {
	switch ($dayOfWeek){
		case 6:
		return 'Sabtu';
		case 0:
		return 'Minggu';
		case 1:
		return 'Senin';
		case 2:
		return 'Selasa';
		case 3:
		return 'Rabu';
		case 4:
		return 'Kamis';
		case 5:
		return 'Jumat';
		default:
		return '';
	}
}


function tgl_indo_singkatan($datetime){
	$tanggal = date('Y-m-d',strtotime($datetime));
	$jam     = date('H:i:s',strtotime($datetime));
	$bulan = array (
		1 => 'Jan',
		'Feb',
		'Mar',
		'Apr',
		'Mei',
		'Juni',
		'Juli',
		'Agt',
		'Sept',
		'Okt',
		'Nov',
		'Des'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function tgl_indo($datetime){
	$tanggal = date('Y-m-d',strtotime($datetime));
	$jam     = date('H:i:s',strtotime($datetime));
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function datetime_indo($datetime){
	$tanggal = date('Y-m-d',strtotime($datetime));
	$jam     = date('H:i',strtotime($datetime));
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0].' | '.$jam;
}

function html_cut($text, $max_length)
{
	$tags   = array();
	$result = "";

	$is_open   = false;
	$grab_open = false;
	$is_close  = false;
	$in_double_quotes = false;
	$in_single_quotes = false;
	$tag = "";

	$i = 0;
	$stripped = 0;

	$stripped_text = strip_tags($text);

	while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length)
	{
		$symbol  = $text[$i];
		$result .= $symbol;

		switch ($symbol)
		{
			case '<':
			$is_open   = true;
			$grab_open = true;
			break;

			case '"':
			if ($in_double_quotes)
				$in_double_quotes = false;
			else
				$in_double_quotes = true;

			break;

			case "'":
			if ($in_single_quotes)
				$in_single_quotes = false;
			else
				$in_single_quotes = true;

			break;

			case '/':
			if ($is_open && !$in_double_quotes && !$in_single_quotes)
			{
				$is_close  = true;
				$is_open   = false;
				$grab_open = false;
			}

			break;

			case ' ':
			if ($is_open)
				$grab_open = false;
			else
				$stripped++;

			break;

			case '>':
			if ($is_open)
			{
				$is_open   = false;
				$grab_open = false;
				array_push($tags, $tag);
				$tag = "";
			}
			else if ($is_close)
			{
				$is_close = false;
				array_pop($tags);
				$tag = "";
			}

			break;

			default:
			if ($grab_open || $is_close)
				$tag .= $symbol;

			if (!$is_open && !$is_close)
				$stripped++;
		}

		$i++;
	}

	while ($tags)
		$result .= "</".array_pop($tags).">";

	return $result;
}

function slugify($text){
  // replace non letter or digits by -
  $text = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $text));
  $words = preg_replace('/[0-9]+/', '', $text);
  return $words;
}

function slugify2($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function waktu_lalu($timestamp)
{
	$selisih = time() - strtotime($timestamp);
	$detik = $selisih ;
	$menit = round($selisih / 60 );
	$jam = round($selisih / 3600 );
	$hari = round($selisih / 86400 );
	$minggu = round($selisih / 604800 );
	$bulan = round($selisih / 2419200 );
	$tahun = round($selisih / 29030400 );
	if ($detik <= 60) {
		$waktu = $detik.'seconds ago';
	} else if ($menit <= 60) {
		$waktu = $menit.' minutes ago';
	} else if ($jam <= 24) {
		$waktu = $jam.' hours ago';
	} else if ($hari <= 7) {
		$waktu = $hari.' days ago';
	} else if ($minggu <= 4) {
		$waktu = $minggu.' weeks ago';
	} else if ($bulan <= 12) {
		$waktu = $bulan.' months ago';
	} else {
		$waktu = $tahun.' years ago';
	}
	return $waktu;
}