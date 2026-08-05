from datetime import datetime
from typing import Optional
from sqlmodel import Field, SQLModel

class kumpul(SQLModel, table=True):
    id_kumpul: Optional[int] = Field(default=None, primary_key=True)
    id_tugas: int = Field(index=True)
    nama_mahasiswa: str = Field(index=True)
    tanggal_kumpul: datetime = Field(...)

class kumpul_update(SQLModel):
    id_tugas: int 
    nama_mahasiswa: str 
    tanggal_kumpul: datetime 