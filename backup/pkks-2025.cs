using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Pkks
{
    #region Portfolio
    public class Portfolio
    {
        #region Member Variables
        protected int _id;
        protected string _file_name;
        protected string _file_path;
        protected string _file_type;
        protected string _file_category;
        protected int _file_size;
        protected string _description;
        protected unknown _uploaded_at;
        #endregion
        #region Constructors
        public Portfolio() { }
        public Portfolio(string file_name, string file_path, string file_type, string file_category, int file_size, string description, unknown uploaded_at)
        {
            this._file_name=file_name;
            this._file_path=file_path;
            this._file_type=file_type;
            this._file_category=file_category;
            this._file_size=file_size;
            this._description=description;
            this._uploaded_at=uploaded_at;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string File_name
        {
            get {return _file_name;}
            set {_file_name=value;}
        }
        public virtual string File_path
        {
            get {return _file_path;}
            set {_file_path=value;}
        }
        public virtual string File_type
        {
            get {return _file_type;}
            set {_file_type=value;}
        }
        public virtual string File_category
        {
            get {return _file_category;}
            set {_file_category=value;}
        }
        public virtual int File_size
        {
            get {return _file_size;}
            set {_file_size=value;}
        }
        public virtual string Description
        {
            get {return _description;}
            set {_description=value;}
        }
        public virtual unknown Uploaded_at
        {
            get {return _uploaded_at;}
            set {_uploaded_at=value;}
        }
        #endregion
    }
    #endregion
}