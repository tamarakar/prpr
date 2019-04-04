using System.ComponentModel.DataAnnotations.Schema;

namespace lab3
{
    [Table("services")]
    public class Service
    {
        [Column("id")]
        public int ServiceId { get; set; }
        public string name { get; set; }
    }
}