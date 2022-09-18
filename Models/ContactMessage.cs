using System;
using System.ComponentModel.DataAnnotations;

namespace Takerman.Portfolio.Models{
    public class ContactMessage
    {
        public ContactMessage()
        {
        }

        public ContactMessage(string name, string email, string subject, string message) : this() 
        {
            this.Name = name;
            this.Email = email;
            this.Subject = subject;
            this.Message = message;
        }

        [Required]
        public string Name { get; set; }
        
        [Required]
        [DataType(DataType.EmailAddress)]
        [EmailAddress]
        public string Email { get; set; }
        
        public string Subject { get; set; }
        
        public string Message { get; set; }
    }
}