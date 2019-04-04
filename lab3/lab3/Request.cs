using System.ComponentModel.DataAnnotations.Schema;

namespace lab3
{
    [Table("requests")]
    public class Request
    {
        [Column("id")]
        public int RequestId { get; set; }

        [Column("client_id")]
        public int ClientId { get; set; }

        [Column("service_id")]
        public int ServiceId { get; set; }
    }
}