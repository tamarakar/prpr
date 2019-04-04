using System.ComponentModel.DataAnnotations.Schema;

namespace lab3
{
    [Table("clients")]
    public class Client
    {
        [Column("id")]
        public int ClientId { get; set; }
        public string name { get; set; }
    }
}
