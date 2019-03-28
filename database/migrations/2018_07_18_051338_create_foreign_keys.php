<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('santri', function(Blueprint $table) {
			$table->foreign('pekerjaan_ayah_id')->references('id')->on('pekerjaan')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('santri', function(Blueprint $table) {
			$table->foreign('pekerjaan_ibu_id')->references('id')->on('pekerjaan')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('santri', function(Blueprint $table) {
			$table->foreign('tahun_akademik')->references('id')->on('tahun_akademik')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('kelas', function(Blueprint $table) {
			$table->foreign('wali_kelas')->references('id')->on('guru')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('registrasi_kelas', function(Blueprint $table) {
			$table->foreign('nama')->references('id')->on('santri')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('registrasi_kelas', function(Blueprint $table) {
			$table->foreign('kelas')->references('id')->on('kelas')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('registrasi_kelas', function(Blueprint $table) {
			$table->foreign('tahun_akademik')->references('id')->on('tahun_akademik')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('absensi', function(Blueprint $table) {
			$table->foreign('nama')->references('id')->on('registrasi_kelas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('absensi', function(Blueprint $table) {
			$table->foreign('jadwal')->references('id')->on('jadwal')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('absensi', function(Blueprint $table) {
			$table->foreign('pertemuan')->references('id')->on('pertemuan')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('mengajar', function(Blueprint $table) {
			$table->foreign('jadwal')->references('id')->on('jadwal')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('mengajar', function(Blueprint $table) {
			$table->foreign('pertemuan')->references('id')->on('pertemuan')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('jadwal', function(Blueprint $table) {
			$table->foreign('pelajaran')->references('id')->on('mapel')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('jadwal', function(Blueprint $table) {
			$table->foreign('kelas')->references('id')->on('kelas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('jadwal', function(Blueprint $table) {
			$table->foreign('guru')->references('id')->on('guru')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('jadwal', function(Blueprint $table) {
			$table->foreign('hari')->references('id')->on('hari')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('jadwal', function(Blueprint $table) {
			$table->foreign('tahun_akademik')->references('id')->on('tahun_akademik')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('nilai', function(Blueprint $table) {
			$table->foreign('nama')->references('id')->on('registrasi_kelas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('nilai', function(Blueprint $table) {
			$table->foreign('mapel')->references('id')->on('mapel')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('nilai', function(Blueprint $table) {
			$table->foreign('guru')->references('id')->on('guru')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('nilai', function(Blueprint $table) {
			$table->foreign('tahun_akademik')->references('id')->on('tahun_akademik')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('pengguna', function(Blueprint $table) {
			$table->foreign('guru')->references('id')->on('guru')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('santri', function(Blueprint $table) {
			$table->dropForeign('santri_pekerjaan_ayah_id_foreign');
		});
		Schema::table('santri', function(Blueprint $table) {
			$table->dropForeign('santri_pekerjaan_ibu_id_foreign');
		});
		Schema::table('santri', function(Blueprint $table) {
			$table->dropForeign('santri_tahun_akademik_foreign');
		});
		Schema::table('kelas', function(Blueprint $table) {
			$table->dropForeign('kelas_wali_kelas_foreign');
		});
		Schema::table('registrasi_kelas', function(Blueprint $table) {
			$table->dropForeign('registrasi_kelas_nama_foreign');
		});
		Schema::table('registrasi_kelas', function(Blueprint $table) {
			$table->dropForeign('registrasi_kelas_kelas_foreign');
		});
		Schema::table('registrasi_kelas', function(Blueprint $table) {
			$table->dropForeign('registrasi_kelas_tahun_akademik_foreign');
		});
		Schema::table('absensi', function(Blueprint $table) {
			$table->dropForeign('absensi_nama_foreign');
		});
		Schema::table('absensi', function(Blueprint $table) {
			$table->dropForeign('absensi_jadwal_foreign');
		});
		Schema::table('absensi', function(Blueprint $table) {
			$table->dropForeign('absensi_pertemuan_foreign');
		});
		Schema::table('mengajar', function(Blueprint $table) {
			$table->dropForeign('mengajar_jadwal_foreign');
		});
		Schema::table('mengajar', function(Blueprint $table) {
			$table->dropForeign('mengajar_pertemuan_foreign');
		});
		Schema::table('jadwal', function(Blueprint $table) {
			$table->dropForeign('jadwal_pelajaran_foreign');
		});
		Schema::table('jadwal', function(Blueprint $table) {
			$table->dropForeign('jadwal_kelas_foreign');
		});
		Schema::table('jadwal', function(Blueprint $table) {
			$table->dropForeign('jadwal_guru_foreign');
		});
		Schema::table('jadwal', function(Blueprint $table) {
			$table->dropForeign('jadwal_hari_foreign');
		});
		Schema::table('jadwal', function(Blueprint $table) {
			$table->dropForeign('jadwal_tahun_akademik_foreign');
		});
		Schema::table('nilai', function(Blueprint $table) {
			$table->dropForeign('nilai_nama_foreign');
		});
		Schema::table('nilai', function(Blueprint $table) {
			$table->dropForeign('nilai_mapel_foreign');
		});
		Schema::table('nilai', function(Blueprint $table) {
			$table->dropForeign('nilai_guru_foreign');
		});
		Schema::table('nilai', function(Blueprint $table) {
			$table->dropForeign('nilai_tahun_akademik_foreign');
		});
		Schema::table('pengguna', function(Blueprint $table) {
			$table->dropForeign('pengguna_guru_foreign');
		});
	}
}