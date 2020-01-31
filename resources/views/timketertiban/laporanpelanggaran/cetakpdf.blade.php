
                          <table>
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th style="text-align:left">Nama</th>
                                      <th style="text-align:left">Kelas</th>
                                      <th style="text-align:left">Kategori pelanggaran</th>
                                      <th style="text-align:left">Jenis pelanggaran</th>
                                      <th style="text-align:left">Poin</th>
                                      <th style="text-align:left">Tanggal</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @php $no = 1 @endphp
                                  @foreach ($pilihkelas as $pk)
                                  <tr>
                                      <td>{{$no++}}</td>
                                      <td style="text-align:left">{{$pk->name}}</td>
                                      <td style="text-align:left">{{$pk->kelas}}</td>
                                      <td style="text-align:left">{{$pk->kategoripelanggaran}}</td>
                                      <td style="text-align:left">{{$pk->jenisPelanggaran}}</td>
                                      <td style="text-align:left">{{$pk->poin}}</td>
                                      <td style="text-align:left">{{$pk->tanggalPelanggaran}}</td>
                                  </tr>    
                                  @endforeach
                              </tbody>
                          </table>