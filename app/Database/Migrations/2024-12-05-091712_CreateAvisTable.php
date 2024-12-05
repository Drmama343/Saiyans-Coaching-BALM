<?php




namespace App\Database\Migrations;




use CodeIgniter\Database\Migration;




class CreateAvisTable extends Migration
{
  public function up()
  {
      $this->forge->addField([
          'idachat'    => [
              'type'       => 'INT',
              'null'       => false,
          ],
          'note'       => [
              'type'       => 'INT',
              'constraint' => 5,
              'null'       => false,
          ],
          'temoignage' => [
              'type'       => 'TEXT',
              'null'       => true,
          ],
          'date'       => [
               'type'       => 'DATE',
               'null'       => false,
           ],
      ]);

      $this->forge->addKey('idachat', true);
      $this->forge->addForeignKey('idachat', 'achat', 'idachat', 'CASCADE', 'CASCADE');

      $this->forge->createTable('avis', true);
  }




  public function down()
  {
      $this->forge->dropTable('avis', true);
  }
}












